import React, { Component } from "react";
import './App.css'
import {
MDBNavbar, MDBNavbarBrand, MDBNavbarNav, MDBNavItem, MDBNavLink, MDBNavbarToggler, MDBCollapse, 
MDBDropdown, MDBDropdownToggle, MDBDropdownMenu, MDBDropdownItem
} from "mdbreact";
import {Switch, Route, BrowserRouter as Router } from 'react-router-dom';

import Servicos from './Pages/Servicos'
import Relatorios from './Pages/Relatorios'
import Footer from './Template/Footer'


class App extends Component {
    state = {
        isOpen: false
    };

    toggleCollapse = () => {
        this.setState({ isOpen: !this.state.isOpen });
    }

    render() {
        return (
          <div>
            <Router>
              <MDBNavbar color="blue" dark expand="md">
                  <MDBNavbarBrand>
                      <MDBNavLink className="white-text" to="/">Extras</MDBNavLink>
                    {/*
                    <strong className="white-text">Extras</strong>
                    */}
                  </MDBNavbarBrand>
                  <MDBNavbarToggler onClick={this.toggleCollapse} />
                  <MDBCollapse id="navbarCollapse3" isOpen={this.state.isOpen} navbar>
                      <MDBNavbarNav left>
                          <MDBNavItem>
                              <MDBNavLink to="/servicos">Serviços</MDBNavLink>
                          </MDBNavItem>
                          <MDBNavItem>
                              <MDBNavLink to="/relatorios">Relatórios</MDBNavLink>
                          </MDBNavItem>
                      </MDBNavbarNav>
                      <MDBNavbarNav right>
                          <MDBNavItem>
                              <MDBDropdown>
                                  <MDBDropdownToggle nav caret>
                                      <span className="mr-2">Nome do Usuário</span>
                                  </MDBDropdownToggle>
                                  <MDBDropdownMenu>
                                      <MDBDropdownItem href="#!">Action</MDBDropdownItem>
                                      <MDBDropdownItem href="#!">Another Action</MDBDropdownItem>
                                      <MDBDropdownItem href="#!">Something else here</MDBDropdownItem>
                                      <MDBDropdownItem href="#!">Something else here</MDBDropdownItem>
                                  </MDBDropdownMenu>
                              </MDBDropdown>
                          </MDBNavItem>
                      </MDBNavbarNav>
                  </MDBCollapse>
              </MDBNavbar>
              <Switch>
                <Route  path="/" exact >
                  <Servicos />
                </Route>
                <Route path="/servicos">
                  <Servicos />
                </Route>
                <Route path="/relatorios">
                  <Relatorios />
                </Route>
              </Switch>
            </Router>
            <Footer />
          </div>
        )
    }
}

export default App;