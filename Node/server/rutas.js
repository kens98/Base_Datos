const Router = require('express').Router();
const mod = require('./model.js')



Router.post('/new',function(req,res){
	users=new mod.UserModel({
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
	mod.UserModel.find({'nombres':req.body.user,'password':req.body.pass},(err,task)=>{
		if(err){
			throw err;
		}
		//res.send(task);
		if(task.length>0){
			res.send("Validado")
		}
		else{
			res.send("No encontrado")
		}

	})
				    
})
// extrae todos los eventos
Router.post('/events/all',function(req,res){
	//let user=0
	/*UserModel.find({'nombres':req.body.user},(err,task)=>{
		if(err){
			user=0
		}else{
			use=task.id;
		}
	})*/
	//mod.EventModel.find({'usuario':this.user},(err,task)=>{
		mod.EventModel.find({},(err,task)=>{
		if(err){
			res.send(err)
		}else{
			res.json(task)
		}
	})
	//res.send('llego')
})


Router.post('/events/new',(req,res)=>{
	event=new mod.EventModel({
		id:Math.floor(Math.random() * 50),
		title:req.body.title,
		start:req.body.start,
		end:req.body.end

	})
	event.save(function(err){
		if(err){
			res.status(500)
            res.json(error)
		}
		res.send('Usuario creado')
	})

})

Router.post('/events/delete/:id',(req,res)=>{
	mod.EventModel.remove({id:req.body.id},function(err,task){
		if(err){
			res.send("error "+err)
		}
		res.send("eliminado "+req.body.id)
	})

})
Router.post('/events/update',(req,res)=>{
	mod.EventModel.updateOne(
		{id:req.body.id},
		{$set:{start:req.body.start,end:req.body.end}},
		function(err,task){
		if(err){
			res.send("error "+err)
		}
		res.send("actualizado "+req.body.id)
	})

})

//Obtener todos los usuarios
Router.get('/all', function(req, res) {
    mod.UserModel.find({}).exec(function(err, docs) {
        if (err) {
            res.status(500)
            res.json(err)
        }
        res.json(docs)
    })
})

module.exports = Router