import { useState } from 'react';
import { useEffect } from 'react';
import './App.css';
import List from './Components/List';
import axios from 'axios';
import Create from './Components/Create';

function App() {

  const [mushrooms, setMushrooms] = useState([]);

  useEffect(() => {
    axios.get('http://front.lt/api/grybai')
    .then(res => {
      setMushrooms(res.data.grybai);
    })
  }, []);


  return (
    <>
    <Create/>
    <List mushrooms={mushrooms} />
    </> 
  );
}

export default App;
