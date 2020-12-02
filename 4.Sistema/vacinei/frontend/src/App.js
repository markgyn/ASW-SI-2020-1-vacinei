import React from 'react'
import { BrowserRouter } from 'react-router-dom'
import './App.css'

import { AuthProvider } from 'context/AuthContext'
import Index from 'pages'

function App() {
  return (
    <AuthProvider value={{}}>
      <BrowserRouter>
        <Index />
      </BrowserRouter>
    </AuthProvider>
  );
}

export default App;
