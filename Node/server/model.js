const mongoose = require('mongoose')

const Schema = mongoose.Schema

let UserSchema = new Schema({
  userId: { type: Number, required: true, unique: true},
  nombres: { type: String, required: true },
  password: { type: String, required: true}
  
})

let UserModel = mongoose.model('Usuario', UserSchema)

module.exports = UserModel