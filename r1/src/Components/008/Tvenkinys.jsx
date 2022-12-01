import Daiktas from "./Daiktas";

function Tvenkinys({seaPlaners}) {

    return (
        <>
            <Daiktas show={1} seaPlaners={seaPlaners} />
            <Daiktas show={2} seaPlaners={seaPlaners} />
        </>
    )
}

export default Tvenkinys;