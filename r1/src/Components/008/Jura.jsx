import Bala from "./Bala";
import Laivas from "./Laivas";
import Sala from "./Sala";
import Valtis from "./Valtis";

function Jura({p}) {
    
    if (p.type === 'man') {
        return (
           <Valtis p={p} />
        )
    }
    if (p.type === 'car') {
        return (
           <Laivas p={p} />
        )
    }
    if (p.type === 'animal') {
        return (
           <Sala p={p} />
        )
    }
    if (p.type === 'fish') {
        return (
           <Bala p={p} />
        )
    }
}

export default Jura;