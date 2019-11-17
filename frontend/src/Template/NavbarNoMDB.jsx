import React from 'react'
//import { Link } from 'react-router-dom'


export default function Navbar(){
    return(
        <nav className="mb-1 navbar navbar-expand-lg navbar-dark primary-color fixed-top">
            <a className="navbar-brand" href="/">Extras</a>
            <button className="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-333"
                aria-controls="navbarSupportedContent-333" aria-expanded="false" aria-label="Toggle navigation">
                <span className="navbar-toggler-icon"></span>
            </button>
            <div className="collapse navbar-collapse" id="navbarSupportedContent-333">
                <ul className="navbar-nav mr-auto">
                    <li className="nav-item">
                        <a className="nav-link" href="/servicos">Serviços</a>
                    </li>
                    <li className="nav-item">
                        <a className="nav-link" href="/relatorios">Relatórios</a>
                    </li>
                </ul>
                <ul className="navbar-nav ml-auto nav-flex-icons">
                    <li className="nav-item dropdown">
                        <a  className="nav-link dropdown-toggle" id="navbarDropdownMenuLink-333" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                            <i className="fas fa-user"></i> Nome do Usuário
                        </a>
                        <div className="dropdown-menu dropdown-menu-right dropdown-default"
                        aria-labelledby="navbarDropdownMenuLink-333">
                            <a className="dropdown-item" href="/#">Nome perfil</a>
                            <a className="dropdown-item" href="/usuarios">Usuários</a>
                            <a className="dropdown-item" href="/testes/restart">RESTART</a>
                            <a className="dropdown-item" href="/sair">Sair</a>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>

    )
}


