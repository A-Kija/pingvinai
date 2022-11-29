function Sq({square, setSq}) {

    const destroy = () => {
        setSq(s => s.filter(oneSq => oneSq.id !== square.id));
    }

    return (
        <div className="sq" style={{
            backgroundColor: square.color
        }} onClick={destroy}>
            {square.id}
        </div>
    )
}

export default Sq;