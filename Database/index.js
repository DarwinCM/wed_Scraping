const puppeteer = require('puppeteer');
const ExcelJS = require('exceljs');
const randomUseragent = require('random-useragent');
const Database = require('./Database');

let data = [];
const db = new Database(); // Inicializa la conexión a la base de datos

const saveExcel = (data) => {
    const workbook = new ExcelJS.Workbook();
    const fileNombre = `datos.xlsx`;
    const sheet = workbook.addWorksheet('Resultados');
    const reColumns = [
        { header: 'Nombre', key: 'nombre' },
        { header: 'Descrip', key: 'descrip' },
        { header: 'Body', key: 'body' },
        { header: 'Fecha', key: 'fecha' },
        { header: 'Image', key: 'image' }
    ];
    sheet.columns = reColumns;
    sheet.addRows(data);

    workbook.xlsx.writeFile(fileNombre).then(() => {
        console.log('Archivo EXCEL creado exitosamente.');
    }).catch(() => {
        console.log('Error guardando el archivo EXCEL');
    });
};

const saveToDatabase = (item) => {
    if (typeof item !== 'object' || Array.isArray(item)) {
        console.error('Data no es un objeto:', item);
        return;
    }
    db.insertData(item);
};

const delay = (ms) => new Promise(resolve => setTimeout(resolve, ms));

const processPage = async (page, url) => {
    console.log('Visitando página ==>', url);

    await page.goto(url, { waitUntil: 'networkidle2' });
    await page.waitForSelector('.layout-inner');

    const objectNextButton = await page.$('.andes-pagination__button--next a');
    const nextUrl = await page.evaluate(el => el ? el.getAttribute('href') : null, objectNextButton);

    const listaDeItems = await page.$$('.layout-wrap');

    for (const item of listaDeItems) {
        const image = await item.$(".wp-post-image");
        const nombre = await item.$(".entry-title a");
        const descrip = await item.$(".post-author-bd a");
        const body = await item.$(".post-excerpt");
        const fecha = await item.$(".post-date-bd");

        const getNombre = await page.evaluate(el => el ? el.innerText : 'N/A', nombre);
        const getDescrip = await page.evaluate(el => el ? el.innerText : 'N/A', descrip);
        const getImage = await page.evaluate(el => el ? el.getAttribute('src') : 'N/A', image);
        const getBody = await page.evaluate(el => el ? el.innerText : 'N/A', body);
        const getFecha = await page.evaluate(el => el ? el.innerText : 'N/A', fecha);

        const itemData = {
            nombre: getNombre,
            descrip: getDescrip,
            body: getBody,
            fecha: getFecha,
            image: getImage
        };

        data.push(itemData);
        saveToDatabase(itemData); // Guarda cada ítem en la base de datos en tiempo real

        await delay(2000); // Espera 20 segundos antes de procesar el siguiente ítem
    }

    return nextUrl ? `https://diariosinfronteras.com.pe/${nextUrl}` : null;
};

const initialization = async (urls) => {
    const browser = await puppeteer.launch({
        headless: true, // Ejecutar en modo "headless"
        ignoreHTTPSErrors: true
    });

    for (const url of urls) {
        const page = await browser.newPage();
        const header = randomUseragent.getRandom((ua) => ua.browserName === 'Firefox');
        await page.setUserAgent(header);
        await page.setViewport({ width: 1920, height: 1080 });

        let nextUrl = url;

        while (nextUrl) {
            nextUrl = await processPage(page, nextUrl);
        }

        await page.close();
    }

    await browser.close();
    saveExcel(data); // Guarda en Excel una vez que se han procesado todas las páginas
    db.close(); // Cierra la conexión a la base de datos
};

// Lista de URLs que quieres procesar
const urls = [
    'https://diariosinfronteras.com.pe/category/deportes/',
    'https://diariosinfronteras.com.pe/category/deportes/page/3/',
    'https://diariosinfronteras.com.pe/category/deportes/page/4/',
    'https://diariosinfronteras.com.pe/category/deportes/page/5/',
    'https://diariosinfronteras.com.pe/category/deportes/page/6/'
];

initialization(urls);
