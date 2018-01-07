const mongoose = require('mongoose')

const Schema = mongoose.Schema

let UserSchema = new Schema({
  userId: { type: Number, required: true, unique: true},
  nombres: { type: String, required: true },
  password: { type: String, required: true}
  
})



let UserModel = mongoose.model('Usuario', UserSchema)

//module.exports = UserModel


let EventSchema = new Schema({
	id:{type:Number,required:true,unique:true},
	title:{type:String, required:true},
	start:{type:Date, required:true},
	end:{type:Date},
	hora_inicial:{type:String},
	hora_finalizacion:{type:String},
	dia_completo:{type:Boolean},
	usuario:{type:Number}
})
let EventModel = mongoose.model('Eventos',EventSchema)

module.exports={UserModel,EventModel}
