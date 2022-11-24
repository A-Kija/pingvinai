import Sq from "./Sq";

function Valio({padingas, spalva, bg, cross}) {
    return (

        <>
        <h1 style={{
            backgroundColor: spalva,
            padding: padingas
        }}>Valio</h1>
        <Sq bg={bg} cross={cross} />
        </>


        
    );
}

export default Valio;