const express = require('express');
const cors = require('cors');


const app = express();
const port = '4000';

app.use(cors({
    origin: "*"
}))

app.get('/', (req, res) => {
    //console.log(req);
    res.status(200).json({ test: "xong"});
})

app.listen(port, () => {
    console.log('server backend đã chạy tại port ' + port)
});