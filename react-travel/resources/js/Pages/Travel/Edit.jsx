import { useEffect, useState } from "react";

function Edit({modalData, setModalData, setUpdateData}) {


    const [country, setCountry] = useState('');
    const [hotel, setHotel] = useState('');


    useEffect(() => {
        if (null === modalData) {
            return;
        }
        setCountry(modalData.country);
        setHotel(modalData.hotel);
    }, [modalData]);

    const save = () => {
        setUpdateData({
            hotel,
            country,
            id: modalData.id
        });
        setModalData(null);
    }



    if (null === modalData) {
        return null;
    }

    return (
        <div className="modal fade" id="staticBackdrop">
            <div className="modal-dialog modal-dialog-centered">
                <div className="modal-content">
                    <div className="modal-header">
                        <h5 className="modal-title" id="staticBackdropLabel">Edit Travel</h5>
                        <button type="button" className="btn-close close-edit" onClick={() => setModalData(null)}></button>
                    </div>
                    <div className="modal-body">
                        <div className="card">
                            <div className="card-body">
                                <div className="mb-3">
                                    <label className="form-label">Country</label>
                                    <input type="text" className="form-control" value={country} onChange={e => setCountry(e.target.value)} />
                                </div>
                                <div className="mb-3">
                                    <label className="form-label">hotel</label>
                                    <input type="text" className="form-control" value={hotel} onChange={e => setHotel(e.target.value)} />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div className="modal-footer">
                        <button className="btn btn-outline-secondary close-edit" onClick={() => setModalData(null)}>Close</button>
                        <button type="button" className="btn btn-outline-primary" onClick={save}>
                            Save
                        </button>
                    </div>
                </div>
            </div>
        </div>
    )
}

export default Edit