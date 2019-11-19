import React, {useEffect, useState} from 'react'
import ServicesOptions from './ServicesOptions'
//import ServicesOptions from './ServicesModal'
//import ServicesOptions from './ServicesModalFuncional'
//import axios from 'axios'

export default function(props){
    const [services, setSevices] = useState([])
    const [modal, setModal] = useState(false)

    useEffect(() => {
        const list = async () => {
            const res = await fetch(`http://localhost/extras/backend/index.php/servicos`)
            //const res = await fetch(`http://api.github.com/users/csadetec`)
            const data = await res.json();
            var {servicos} = data;
            setSevices(servicos)
        }
        list()
    },[])

    const handleOptions = (id) => {
        setModal(true)
     
        console.log(id)
    }
    var cont = 1
    return(
        <div className="container mt-5">
            <div className="row justify-content-center">
                <h2>Status do modal {modal === true ? 'true' : 'false'}</h2>
                <div className="col-md-10 mb-3">
                    <input className="form-control form-control-lg mb-2" type="search" placeholder="Pesquisar Serviços" aria-label="Pesquisar Serviços" id="myInput" data-list="list-group" />
                </div>
            </div>
            <div className="row justify-content-center">
                <div className="col-md-10">
                    <table className="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">DATA</th>
                                <th scope="col">INÍCIO</th>
                                <th scope="col">FIM</th>
                                <th scope="col">MOTIVO</th>
                                <th scope="col">CRIADOR</th>
                                <th scope="col">STATUS</th>
                            </tr>
                        </thead>
                        <tbody id="lista_servicos">
                            {services.map( s => (
                            <tr onClick={() => handleOptions(s.id_servico) } className="cursor-pointer" key = {s.id_servico}>
                                <th scope="row">{cont++}</th>
                                <td>{s.data}</td>
                                <td>{s.horas_inicio}</td>
                                <td>{s.horas_fim}</td>
                                <td>{s.nome_motivo}</td>
                                <td>{s.nome}</td>
                                <td>{s.status ===  '1' ? 'VALIDADO': 'PENDENTE'}</td>
                            </tr>
                            ))}
                        </tbody>
                    </table>
                </div>
            </div>
            
            <ServicesOptions teste={modal} name="como vou te chamar" />
        </div>
    )
}