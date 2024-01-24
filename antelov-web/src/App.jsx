import { useState } from "react";
import { BrowserRouter, Routes, Route } from "react-router-dom";
import Counter from "../src/components/Counter";
import Navbar from "./pages/navbar";
import Home from "./pages/home";
import "./App.css";
import LoginPage from "./pages/LoginPage";
import NotFound from "./components/NotFound";
import SignUp from "./pages/SignUp";
import SignInMover from "./pages/SignInMover";
import SignUpMover from "./pages/SignUpMover";
import Contact from "./pages/contact";
import Footer from "./pages/footer";
import Profile from "./pages/profile";
import LandingScreen from "./pages/LandingScreen";
import RequestSummary from "./pages/RequestSummary";
import Historypage from "./pages/historypage";
import SubmitRequest from "./pages/submitRequest";
function App() {
  const [loged, setloged] = useState(false);

  return (
    <div className="">
      <BrowserRouter>
        {loged ? (
          <header>
            <Navbar />
          </header>
        ) : (
          <></>
        )}
        <main className="bg-[#FFF7F3] min-h-screen ">
          <Routes>
            <Route path="/" element={<LandingScreen />} />
            <Route path="/home" element={<Home />} />
            <Route path="/profile" element={<Profile />} />
            <Route path="/login" element={<LoginPage />} />
            <Route path="/signinmover" element={<SignInMover />} />
            <Route path="/signup" element={<SignUp />} />
            <Route path="/signupmover" element={<SignUpMover />} />
            <Route path="/contact" element={<Contact />} />
            <Route path="/requestsummary" element={<RequestSummary />} />
            <Route path="/historypage" element={<Historypage />} />
            <Route path="/submitRequest" element={<SubmitRequest />} />

            
            {/* Add a wildcard route for unmatched paths */}
            <Route path="*" element={<NotFound />} />
          </Routes>
          {/* <Footer /> */}
        </main>
      </BrowserRouter>
    </div>
  );
}

export default App;
