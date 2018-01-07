let mongoose=require('mongoose'),
	model=require('./model.js');

mongoose.connect('mongodb://localhost/proyecto')

let user=model.UserModel(
	{userId:Math.floor(Math.random() * 50),nombres:'kevin',password:'123'}
)

user.save((err)=>{
	if(err){console.log('error '+err)}
	console.log('Usuario creado')
})


/*
 Crea un script en el servidor que al ejecutarse por consola, 
 cree un nuevo usuario para el sistema en una base de datos en MongoDB. 
 */
	