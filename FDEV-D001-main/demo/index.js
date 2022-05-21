//console.log("Server API is Working");
const { response } = require('express');
const fs = require('fs');

var cors = require('cors');
const bodyParser = require('body-parser');

const express = require('express');
const app = express();

var products = require('./data/products.json');

var corsOptions = {
    origin: '*',
    optionsSuccessStatus: 200 // some legacy browsers (IE11, various SmartTVs) choke on 204
}

const number_item_on_page = 10;

app.use(cors(corsOptions));

app.use(bodyParser.urlencoded({ extended: false }));
app.use(bodyParser.json())

app.get('/', (req, res) => {
    res.send('Xin chào bạn đã connect đến server API');
});

app.get('/products', (req, res) => {
    //console.log(products);
    //console.log(req.query);
    if(req.query.page){
        res.status(200).json(products.slice(req.query.page * number_item_on_page, (req.query.page * number_item_on_page) + number_item_on_page));
    }
    else{
        res.status(200).json(products);
    }
    
})

app.get('/products/total-page', (req, res) => {
    var number_page = Math.ceil(products.length / number_item_on_page);
    res.status(200).json({so_trang: number_page});
})

app.post('/product', (req, res) => {
    //console.log(req.body);
    var item_sach = req.body;
    item_sach.id = (products[products.length - 1].id) * 1 + 1;

    //console.log(item_sach);
    products.push(item_sach);
    //console.log(products);

    try {
        fs.writeFileSync('./data/products.json', JSON.stringify(products));
        res.status(200).send('OK');
    }
    catch(error){
        res.status(400).send(error);
    }
    
})

app.listen('4000', () => {
    console.log('Server API is working');
})