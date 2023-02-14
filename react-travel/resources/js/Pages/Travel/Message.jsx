function Message({messages}) {

    if (messages.length === 0) {
        return null;
    }

    return (
        <div className="message-bin">
            {
                messages.map(m => <div key={m.id} className={m.type}>{m.text}</div>)
            }
        </div>
    )
}

export default Message;