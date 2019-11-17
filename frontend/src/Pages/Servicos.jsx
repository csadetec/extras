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
                        <tr>
                            <th scope="row">s1</th>
                            <td className="d-none">teste</td>
                            <td>13:00</td>
                            <td>14:00</td>
                            <td>AULA EXTRA</td>
                            <td>LUCAS TESTE</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    )
}