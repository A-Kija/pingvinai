import Bala from "./Bala"
function Daiktas({ seaPlaners, show }) {

    // let filtered;

    // if (show === 1) {
    //     filtered = seaPlaners.filter(p => p.id % 2 === 0);
    // } else {
    //     filtered = seaPlaners.filter(p => p.id % 2 === 1);
    // }

    // return (
    //     <ul>
    //         {
    //             filtered.map(p => <Bala key={p.id} p={p} />)
    //         }
    //     </ul>
    // );

        return (
        <ul>
            {
                seaPlaners
                .filter(p => p.id % 2 === show)
                .map(p => <Bala key={p.id} p={p} />)
            }
        </ul>
    );



}

export default Daiktas