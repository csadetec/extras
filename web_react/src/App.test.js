import React, { useState, useEffect} from 'react'

import 'bootstrap/dist/css/bootstrap.min.css';
import {BrowserRouter as Router, Link} from 'react-router-dom'

import { Navbar, Nav, Form, FormControl, Button } from 'react-bootstrap';
export default function ReactBootstrap(){
    return(
        <Router>
            <Navbar bg="primary" variant="dark">
                <Navbar.Brand to="/">Navbar</Navbar.Brand>
                <Nav className="mr-auto">
                    <Link> <Nav.Link to="/servicos">Serviços</Nav.Link></Link>
                    <Nav.Link to="/relatorios">Relatórios</Nav.Link>
                </Nav>
            </Navbar>
        </Router>

    )
}
/*
function App2(){
    const [repositories, setRepositories] = useState([])

    useEffect(() => {
            const list = async() => {
                const response = await fetch('https://api.github.com/users/csadetec/repos')
                const data = await response.json()
                setRepositories(data)
            }
            list()
    }, [])
    //console.log({repositories})

    function handleFavorite(id){
        const newRepositories = repositories.map(repo => {
            return repo.id === id ? {...repo, favorite: !repo.favorite}:repo
        })
        setRepositories(newRepositories)
    }


    return (
        <ul>
            {repositories.map( repo => (
                <li key = {repo.id}>
                    {repo.name}
                    {repo.favorite && <span>(Favorito) </span>}
                    <button onClick={() => handleFavorite(repo.id)}>Favoritar</button>
                </li>
            ))}
        </ul>
    )
}

/*
function App(){
    const [repositories, setRepositories] = useState([
        { id:1, name: 'repo-1'},
        { id:2, name: 'repo-2'},
        { id:3, name: 'repo-3'},
    ])

    function handleAddRepository(){
        setRepositories([
            ...repositories,
            {id: Math.random(), name: `Novo repo ${Math.random()}`}])
    }
    return(
        <>
            <ul>
                {repositories.map(repo => (
                    <li key={repo.id}>{repo.name}</li>
                ))}
            </ul>
            <button onClick={handleAddRepository}>
                Adicionar Repositório
            </button>
        </>
    )
}
/**/