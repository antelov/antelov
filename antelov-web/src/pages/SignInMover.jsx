import BlueInput from "../components/blueInput";
import PrimaryButton from "../components/primaryButton";
const SignInMover = () => {
  return (
    <div className=" w-screen h-screen bg-[#FFF7F3]  flex flex-row">
      <div className="w-[50%]  ">
        <div className="   flex justify-start items-start px-5  xs:items-center xs:justify-center ">
          <img
            src="../../src/assets/6.png"
            className="w-24 h-24  text-2xl font-semibold whitespace-nowrap dark:text-black  "
            alt=""
          />
        </div>
        <img src="../../src/assets/LAST EDIIIT! 1.svg" alt="" className=" " />
      </div>
      <div className=" flex justify-center items-center w-[50%]  bg-white">
        <div className="p-2 w-[50%]   xs:top-5 xs:right-14 xs:p-6  bg-white">
          <BlueInput w={260} h={40} inputName="Email adress or username" />
          <BlueInput w={260} h={40} inputName="Password" />
          <div className=" flex flex-col justify-center items-center p-5 ">
            <PrimaryButton text={"Sign in "} w={200} h={40} />
            <h5>
              Don’t have an account ?{" "}
              <span className="text-[#FE6019] hover:cursor-pointer">
                Sign Up
              </span>
            </h5>
            <h5 className="text-red-600 font-semibold hover:cursor-pointer">
              forgot password ?
            </h5>
          </div>
        </div>
      </div>
    </div>
  );
};

export default SignInMover;
