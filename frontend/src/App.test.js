import React, { useState, useEffect} from 'react'


export default function App2(){
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