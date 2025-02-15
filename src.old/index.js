const express = require('express')
const path = require('path')
const fs = require('fs')
const mysql = require('mysql2')

const connection = mysql.createConnection({
    host: '127.0.0.1',
    user: 'root',
    password: null,
    database: 'konyvwebaruhaz',
    port: 3306,
})
connection.connect()

/**
 * Feltölt egy könyvet az adatbázisba
 * @param {string} title A könyv címe
 * @param {string} imagePath A könyv borítóképének az elérési útja (ezt át kell írni hogy a kliens tudjon feltölteni képet)
 */
function uploadBook(title, imagePath) {
    const fileContent = fs.readFileSync(imagePath)

    connection.query("INSERT INTO books (title, cover) VALUES (?, ?)", [
        title,
        fileContent,
    ], function (err, res) {
        if (err) throw err
        console.log('Book inserted!', res)
    })
}

// Ez tesztelés csak, később ennek kell pl egy POST api
//uploadBook('Nigga', path.join(__dirname, '..', 'web\\bookimg\\Vajak_fecske-torony.jpg'))
const app = express()

// egy adott könyv
app.get('/api/book/:id', (req, res) => {
    // A ? helyére kerülnek a tömbben megadott értékek
    connection.query('SELECT * FROM books WHERE id = ?;', [ // --- ebbe a tömbben
        Number.parseInt(req.params.id)
    ], (error, results, fields) => {
        const book = results[0] // ha nincs 0-dik elem akkor a `book` az undefined
        if (!book) { // ha hamis szerű értéke van (pl undefined) ...
            res.statusCode = 404
            res.end()
        } else {
            // res.json az átalakítja normális alakba, szövegbe, beállítja a dolgokat (Content-Type, stb), stb
            res.json({
                id: book['id'],
                title: book['title'],
                cover: book['cover'].toString('base64'), // itt alakul át base64-re
            })
            res.end()
        }
    })
})

// összes könyv
app.get('/api/books', (req, res) => {
    connection.query('SELECT * FROM books;', (error, results, fields) => {
        // ugyan az
        res.json(results.map(book => ({
            id: book['id'],
            title: book['title'],
            cover: book['cover'].toString('base64'),
        })))
        res.end()
    })
})

// ha nem api kérés jön, akkor csak visszaküldi a fájlokat a web mappából
app.use(express.static(path.join(__dirname, '..', 'web')))

app.listen(8080)
