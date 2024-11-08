const mysql = require('mysql2');

class Database {
    constructor() {
        this.connection = mysql.createConnection({
            host: 'localhost', // Cambia según sea necesario
            user: 'root', // Cambia según sea necesario
            password: '', // Cambia según sea necesario
            database: 'web_escrapy_laravel'
        });

        this.connection.connect((err) => {
            if (err) {
                console.error('Error conectando a la base de datos:', err);
                return;
            }
            console.log('Conexión a la base de datos exitosa.');
        });
    }

    insertData(item) {
        const sql = "INSERT INTO table_settings (nombre, descrip, body, fecha, image) VALUES ?";
        const values = [[item.nombre, item.descrip, item.body, item.fecha, item.image]];

        this.connection.query(sql, [values], (err, results) => {
            if (err) {
                console.error('Error insertando datos:', err);
                return;
            }
            console.log('Datos insertados correctamente:', results);
        });
    }

    close() {
        this.connection.end((err) => {
            if (err) {
                console.error('Error cerrando la conexión:', err);
                return;
            }
            console.log('Conexión a la base de datos cerrada.');
        });
    }
}

module.exports = Database;
