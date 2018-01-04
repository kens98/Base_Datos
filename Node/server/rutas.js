const Router = require('express').Router()
const Users = require('./model.js')

// todos
Router.get('all',function(req,res){
	Users.find({}).exec(function(err, docs) {
        if (err) {
            res.status(500)
            res.json(err)
        }
        res.json(docs)
    })
})
