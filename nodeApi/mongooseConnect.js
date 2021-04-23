require('dotenv').config();

const mongoose = require('mongoose');

module.exports = () => {
    mongoose.connect(process.env.MONGO_URI)
        .then(() => console.log('successful'))
        .catch(e => console.error(e));
};
