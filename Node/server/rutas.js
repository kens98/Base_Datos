const Router = require('express').Router();
const Users = require('./model.js')



Router.post('/new',function(req,res){
	users=new Users({
		userId: Math.floor(Math.random() * 50),
		nombres:req.body.user,
		password:req.body.pass

	})
	users.save(function(err){
		if(err){
			res.status(500)
            res.json(error)
		}
		res.send('Usuario creado')
	})

})
Router.post('/login',function(req,res){
	Users.find({
					nombres:req.body.user,
					password:req.body.pass
				  }).exec(function(err, docs) {
				        if (err) {
				            res.status(500)
				            res.json(err)
				            //res.send("error")
				        }
				        //res.json(docs)
				        res.send("Validado")
				    })
				    
})



//Obtener todos los usuarios
Router.get('/all', function(req, res) {
    Users.find({}).exec(function(err, docs) {
        if (err) {
            res.status(500)
            res.json(err)
        }
        res.json(docs)
    })
})

module.exports = Router