function Book({ book }) {
    return (
        <li>
            <img src={book.img} alt="book"></img>
            <h2>{book.title}</h2>
            <h2>{book.price}</h2>
        </li>
    )
}

export default Book;