import React from 'react';
import { Routes, Route } from "react-router-dom";
import './App.css'
import './index.css';
import Login from './pages/login.jsx';

function App() {
  return (
    <div className="">
      {/* <Header /> */}
      <Routes>
        {/* <Route path="/" element={<Home />} /> */}
        <Route path="/login" element={<Login />} />
      </Routes>
      {/* <Footer /> */}
    </div>
  );
}

export default App
