import { useState } from "react";
import { BrowserRouter, Routes, Route } from "react-router-dom";
import Counter from "../src/components/Counter";
import Navbar from "./pages/navbar";
import Home from "./pages/home";
import "./App.css";
import LoginPage from "./pages/LoginPage";
import NotFound from "./components/NotFound";
import SignUp from "./pages/SignUp";
function App() {
  const [loged, setloged] = useState(false);

  return (
    <>
      {loged ? (
        <BrowserRouter>
          <header>
            <Navbar />
          </header>
          <main className="flex justify-center items-center w-full  bg-[#FFF7F3] ">
            <Routes>
              <Route path="/" element={<Home />} />
              <Route path="/login" element={<LoginPage />} />
              {/* Add a wildcard route for unmatched paths */}
              <Route path="*" element={<NotFound />} />
            </Routes>
          </main>
        </BrowserRouter>
      ) : (
        <BrowserRouter>
          <main className="flex justify-center items-center w-full  bg-[#FFF7F3] ">
            <Routes>
              <Route path="/" element={<Home />} />
              <Route path="/login" element={<LoginPage />} />
              <Route path="/signUp" element={<SignUp />} />

              {/* Add a wildcard route for unmatched paths */}
              <Route path="*" element={<NotFound />} />
            </Routes>
          </main>
        </BrowserRouter>
      )}
    </>
  );
}

export default App;
