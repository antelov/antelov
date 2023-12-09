import { useState } from "react";
import { BrowserRouter , Routes , Route , Outlet } from "react-router-dom";
import Counter from "../src/components/Counter";
import Navbar from "./pages/navbar";
import Home from "./pages/home";
import "./App.css";
import LoginPage from "./pages/LoginPage";

function App() {
  const [count, setCount] = useState(0);

  return (
    <>
    <BrowserRouter>
    <header>
    <Navbar />
    </header>
      <main  className="w-full h-screen flex items-center justify-center bg-[#FFF7F3]">
         <Routes>
              <Route path="/" element={  <Home />    } />
              <Route path="/login" element={ <LoginPage/> } />
         </Routes>
      </main>
    </BrowserRouter>
      {/* <div className="flex justify-center items-center w-full h-screen bg-[#FFF7F8]">
        <Home />
      </div> */}
    </>
  );
}

export default App;
