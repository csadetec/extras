import React, {useEffect, useState} from 'react'
//import axios from 'axios'

export default function(){
    const [services, setSevices] = useState([])

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
    console.log(services)
 
    return(
        <div className="row justify-content-center">
            <div className="col-md-8">
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
                    <tbody id="lista_servicos" className="cursor-pointer">
                        {services.map( s => (
                        <tr key = {s.id_servico}>
                            <th scope="row">s.id_servico</th>
                            <td className="d-none">s.id_servico</td>
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
    )
}