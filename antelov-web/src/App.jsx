import { useState } from "react";
import { BrowserRouter, Routes, Route } from "react-router-dom";
import Counter from "../src/components/Counter";
import Navbar from "./pages/navbar";
import Home from "./pages/home";
import "./App.css";
import LoginPage from "./pages/LoginPage";
import NotFound from "./components/NotFound";
import SignUp from "./pages/SignUp";
import LandingPage from "./pages/landingPage";
import SignInMover from "./pages/SignInMover";
import SignUpMover from "./pages/SignUpMover";
import Contact from "./pages/contact";
import Footer from "./pages/footer";
function App() {
  const [loged, setloged] = useState(true);

  return (
    <>
      {loged ? (
        <BrowserRouter>
          <header>
            <Navbar />
          </header>
          <main className="flex flex-col justify-center items-center w-full  bg-[#FFF7F3] ">
            <Routes>
              <Route path="/" element={<LandingPage />} />
              <Route path="/home" element={<Home />} />
              <Route path="/login" element={<LoginPage />} />
              <Route path="/signinmover" element={<SignInMover />} />
              <Route path="/signup" element={<SignUp />} />
              <Route path="/signupmover" element={<SignUpMover />} />
              <Route path="/contact" element={<Contact />} />

              {/* Add a wildcard route for unmatched paths */}
              <Route path="*" element={<NotFound />} />
            </Routes>
              <Footer />
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
            <footer>
              <Footer />
            </footer>
          </main>
        </BrowserRouter>
      )}
    </>
  );
}

export default App;
