import { useState } from "react";

function Create({setCreateData}) {

    const go = () => {
        setCreateData({hotel, country});
        setCountry('');
        setHotel('');
    }

    const [country, setCountry] = useState('');
    const [hotel, setHotel] = useState('');

    return (
        <div className="card-body">
            <div className="mb-3">
                <label className="form-label">Country</label>
                <input type="text" className="form-control" onChange={e => setCountry(e.target.value)} value={country} />
            </div>
            <div className="mb-3">
                <label className="form-label">hotel</label>
                <input type="text" className="form-control" onChange={e => setHotel(e.target.value)} value={hotel}/>
            </div>
            <button type="button" onClick={go} className="btn btn-outline-primary">
                Add New
            </button>
        </div>
    )
}

export default Create;