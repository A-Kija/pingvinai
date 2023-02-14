function List({ travels, setDeleteData }) {


    return (
        <ul className="list-group">
            {
                travels.map(travel => (
                    <li className="list-group-item" key={travel.id}>
                        <div className="flex-row">
                            <div>
                                {travel.country}
                                <i>{travel.hotel}</i>
                            </div>
                            { travel.hide ? '' :
                            <div>
                                <button type="button" className="btn btn-outline-secondary m-2"
                                onClick={() => setDeleteData(travel)}>
                                    delete
                                </button>
                                <button type="button" className="btn btn-outline-secondary m-2">
                                    edit
                                </button>
                            </div>
                            }
                        </div>
                    </li>
                ))
            }
        </ul>
    );
}

export default List;