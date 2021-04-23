var express = require('express');
var router = express.Router();


router.get('/', function(req, res) {
    res.json(({title:'Hello react x node.js'}));
});

module.exports = router;
