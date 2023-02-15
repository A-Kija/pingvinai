import 'bootstrap/dist/css/bootstrap.min.css';
import '../../../sass/style1.scss';
import { useEffect, useState } from 'react';
import axios from 'axios';
import { v4 as uuidv4 } from 'uuid';
import Create from './Create';
import List from './List';
import Message from './Message';
import Edit from './Edit';

function Travel({ travelsData, storeUrl, deleteUrl, updateUrl }) {

    const [createData, setCreateData] = useState(null);
    const [deleteData, setDeleteData] = useState(null);
    const [modalData, setModalData] = useState(null);
    const [updateData, setUpdateData] = useState(null);
    const [travels, setTravels] = useState([]);
    const [messages, setMessages] = useState([]);

    const showMessage = (text, type = '') => {
        const id = uuidv4();
        setMessages(m => [...m, {type, text, id}]);
        setTimeout(() => {
            setMessages(m => m.filter(m => m.id !== id));
        }, 4000);
    }


    useEffect(() => {
        setTravels(travelsData);
    }, []);

    useEffect(() => {
        if (null === createData) {
            return;
        }
        const uuid = uuidv4();
        axios.post(storeUrl, createData)
            .then(res => {
                showMessage(res.data.message, res.data.messageType);
                setTravels(t => t.map(t => t.id !== uuid ? {...t} : {...t, id:res.data.id, hide: false}))

            });
        setTravels(t => [{ ...createData, id: uuid, hide: true }, ...t]) 

    }, [createData]);


    useEffect(() => {
        if (null === deleteData) {
            return;
        }
        axios.delete(deleteUrl + '/' + deleteData.id)
            .then(res => {
                showMessage(res.data.message, res.data.messageType);
            });
        setTravels(t => t.filter(t => t.id !== deleteData.id));

    }, [deleteData]);


    useEffect(() => {
        if (null === updateData) {
            return;
        }
        axios.put(updateUrl + '/' + updateData.id, updateData)
            .then(res => {
                showMessage(res.data.message, res.data.messageType);
            });
        setTravels(t => t.map(t => t.id === updateData.id ? {...updateData} : {...t}));

    }, [updateData])

    return (
        <>
            <div className="container">
                <div className="row justify-content-center">
                    <div className="col-md-4">
                        <div className="card m-4">
                            <div className="card-header">
                                <h1>Add new travel</h1>
                            </div>
                            <div className="card-body">
                                <Create setCreateData={setCreateData} />
                            </div>
                        </div>
                    </div>
                    <div className="col-md-8">
                        <div className="card m-4">
                            <div className="card-header">
                                <h1>Travels list</h1>
                            </div>
                            <div className="card-body">
                                <List travels={travels} setDeleteData={setDeleteData} setModalData={setModalData} />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <Message messages={messages} />
            <Edit modalData={modalData} setModalData={setModalData} setUpdateData={setUpdateData}/>
        </>
    );
}

export default Travel;