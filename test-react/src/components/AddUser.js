import { useState } from "react";
import { useParams, useHistory } from "react-router-dom";

const AddUser = ({ status, callback }) => {
    const { id: eid } = useParams();
    const [username, setName] = useState("");
    const [password, setDept] = useState("");
    const history = useHistory();

    const onSubmit = (e) => {
        e.preventDefault();
        callback(
            status === "edit"
                ? { id: eid, username: username, password: password }
                : { username: username, password: password }
        );
        history.push("/userlist");
    };
    return (
        <div>
            <h2>
                This is {status} user page id: {eid}
            </h2>
            <form onSubmit={onSubmit}>
                <label>
                    Name:
                    <input
                        type="text"
                        name="username"
                        value={username}
                        onChange={(e) => setName(e.target.value)}
                    />
                </label>
                <br />
                <label>
                    Password:
                    <input
                        type="password"
                        name="password"
                        value={password}
                        onChange={(e) => setDept(e.target.value)}
                    />
                </label>
                <br />
                <input type="submit" value="Submit" />
            </form>
        </div>
    );
};

export default AddUser;