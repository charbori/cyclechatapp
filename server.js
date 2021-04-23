const express = require('express');
const app = express();
const bodyParser = require('body-parser');
const port = process.env.POST || 8888;
const api = require('./routes/index');
const cors = require('cors');

app.use(cors());
app.use(bodyParser.json());
app.use('/api', api);
//app.use('/api', (req, res) => res.json({username:'bryan'}));

app.listen(port, () => {
    console.log(`express is running on ${port}`);
})
