import React from 'react';
import { Routes, Route } from "react-router-dom";
import './App.css'
import './index.css';
import Homepage from './pages/homepage.jsx';

import Login from './pages/login.jsx';
import Signup from './pages/signup.jsx';
import Dashboard from './pages/userDashboard.jsx';

function App() {
  return (
    <div className="">
      <Routes>
        <Route path="/" element={<Homepage />} />
       
        <Route path="/login" element={<Login />} />
        <Route path="/signup" element={<Signup />} />
        <Route path="/dashboard" element={<Dashboard />} />

      </Routes>
    </div>
  );
}

export default App