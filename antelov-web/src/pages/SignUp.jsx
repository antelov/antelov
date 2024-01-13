import BlueInput from "../components/blueInput";
import PrimaryButton from "../components/primaryButton";

const SignUp = () => {
  return (
    <div className=" w-screen h-screen ">
      {/* logo */}
      <div className="flex justify-end items-start p-5  xs:items-center xs:justify-center ">
        <img
          src="../../src/assets/6.png"
          className="w-24 h-24  text-2xl font-semibold whitespace-nowrap dark:text-black  md:w-16 md:h-16 "
          alt=""
        />
      </div>
      <div className="flex justify-between items-center content-center place-self-center ">
        {/* images */}

        <div className=" relative   flex justify-start items-start  ">
          <div className="">
            <img
              src="../../src/assets/cred 1.svg"
              alt=""
              className="  w-[400px] ml-20 md:mb-32  md:ml-0 md:w-[200px] "
            />
          </div>
          <div>
            <img
              src="../../src/assets/characteredited.svg"
              className="  absolute w-[140px]  z-10 right-[-140px] top-0 "
              alt=""
            />
          </div>
        </div>
        {/*   input type "SignUp" */}
        <div className="w-screen flex flex-col justify-center items-center  ">
          <div className=" flex flex-row items-center justify-between  ">
            <BlueInput w={260} h={40} inputName="Username" />
            <BlueInput w={260} h={40} inputName="FirstName" />
          </div>
          <div className=" flex flex-row ">
            <BlueInput w={260} h={40} inputName="LastName" />
            <BlueInput w={260} h={40} inputName="Phone number" />{" "}
          </div>
          <div className=" flex flex-row ">

          <BlueInput w={260} h={40} inputName="Email adress" />
          <BlueInput w={260} h={40} inputName="Password" />
          </div>
          <BlueInput w={260} h={40} inputName="Confirm password" />
          <div className=" flex flex-col justify-end items-end py-5 ">
            <PrimaryButton text={"Sign Up "} w={200} h={40} />
            <h5>
              already have an account ?
              <span className="text-[#FE6019] hover:cursor-pointer">
                Sign In
              </span>
            </h5>
          </div>
        </div>
      </div>
    </div>
  );
};

export default SignUp;
