import { Link } from "react-router-dom";
import "./User.css";

const User = ({ id, username, password, deletecallback }) => {
    return (
        <div className="user" style={{ color: "red" }}>
            <h3>Name: {username}</h3>
            <p>ID: {id}</p>
            <p>Password: {password}</p>
            <button onClick={() => deletecallback(id)}>Delete</button>
            <Link to={`/edit/${id}`}> Edit </Link>
        </div>
    );
};

export default User;
