import React, {useState} from 'react';
import {Button, Modal} from 'react-bootstrap'

export default function Example(props) {
    const [show, setShow] = useState(false);
  
    const handleClose = () => setShow(false);
    const handleShow = () => setShow(true);
    
    function teste(){
        if(show === false && props.teste === true){
            setShow(true)
        }else{
            //setShow(false)
        }
        console.log(props.teste)
    }
    teste()
    /** */
    return (
      <>
        <Button variant="primary" onClick={handleShow} >
          {props.name}
        </Button>
        <Modal show={show} onHide={handleClose}>
          <Modal.Header closeButton>
            <Modal.Title>Modal heading</Modal.Title>
          </Modal.Header>
          <Modal.Body>Woohoo, you're reading this text in a modal!</Modal.Body>
          <Modal.Footer>
            <Button variant="secondary" onClick={handleClose}>
              Close
            </Button>
            <Button variant="primary" onClick={handleClose}>
              Save Changes
            </Button>
          </Modal.Footer>
        </Modal>
      </>
    )
}
  

/*
export default function  ServicesOptions(){
    return (
        <div className="modal fade" id="servicesOptions" tabIndex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
            <div className="modal-dialog mt-15" role="document">
                <div className="modal-content">
                    <div className="modal-header">
                        <h5 className="modal-title" id="">Serviço</h5>              
                            <button type="button" className="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                    </div>
                    <div className="modal-body">
                        <div className="row  mb-3">
                            <div className="col-md-6">
                                <button id="btn_duplicate_servico" type="button" className="btn btn-outline-primary btn-block">DUPLICAR</button>
                            </div>
                            <div className="col-md-6">
                                <a href="#!" id="a_editar_servico" className="btn btn-primary btn-block">VISUALIZAR</a>           
                            </div>
                        </div>
                        <div className="row justify-content-center mb-3">                
                            <div className="col-md-12">
                                <input type="hidden" id="id_servico" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
      </div>
    )
}
/** */