import { useState } from "react";
import SigninForm from "../components/SigninForm";
import SignupForm from "../components/SignupForm";
import LeftOverlayContent from "../components/LeftOverlayContent ";
import RightOverlayContent from "../components/RightOverLayContent";

const LoginPage = () => {
  const [isAnimated, setIsAnimated] = useState(false);
  const overlayBg =
    "bg-gradient-to-r from-[#fe6019] via-[#FFEFE8] to-[#fe6019]";

  return (
    <div className="h-4/5 w-4/5 bg-white relative overflow-hidden rounded-2xl shadow-2xl">
      <div
        id="signin"
        className={`bg-white shadow-2xl absolute top-0 left-0 h-full w-1/2 flex justify-center items-center transition-all duration-700 ease-in-out z-20 ${
          isAnimated ? "translate-x-full opacity-0" : ""
        }`}
      >
        <SigninForm />
      </div>

      <div
        id="signup"
        className={`absolute top-0 left-0 h-full w-1/2 flex justify-center items-center transition-all duration-700 ease-in-out ${
          isAnimated
            ? "translate-x-full opacity-100 z-50 animate-show"
            : "opacity-0 z-10"
        }`}
      >
        <div className="h-full w-full flex justify-center items-center">
          <SignupForm />
        </div>
      </div>

      <div
        id="overlay-container"
        className={`absolute top-0 left-1/2 w-1/2 h-full overflow-hidden  transition-transform duration-700 ease-in-out z-100 ${
          isAnimated ? "-translate-x-full" : ""
        }`}
      >
        <div
          id="overlay"
          className={`${overlayBg} relative -left-full h-full w-[200%] transform  transition-transform duration-700 ease-in-out ${
            isAnimated ? "translate-x-1/2" : "translate-x-0"
          }`}
        >
          <div
            id="overlay-left"
            className={`w-1/2 h-full absolute flex justify-center items-center top-0 transform -translate-x-[20%]  transition-transform duration-700 ease-in-out ${
              isAnimated ? "translate-x-0" : "-translate-x-[20%]"
            }`}
          >
            <LeftOverlayContent
              isAnimated={isAnimated}
              setIsAnimated={setIsAnimated}
            />
          </div>
          <div
            id="overlay-right"
            className={`w-1/2 h-full absolute flex justify-center items-center top-0 right-0 transform  transition-transform duration-700 ease-in-out ${
              isAnimated ? "translate-x-[20%]" : "translate-x-0"
            }`}
          >
            <RightOverlayContent
              isAnimated={isAnimated}
              setIsAnimated={setIsAnimated}
            />
          </div>
        </div>
      </div>
    </div>
  );
};

export default LoginPage;