import BlueInput from "../components/blueInput";
import PrimaryButton from "../components/primaryButton";

const signupMovingCompany = () => {
  return (
    <div className="p-2">
         <img
          src="../../src/assets/6.png"
          className="w-16 h-16  p-1 absolute right-8 "
          alt=""
        />
      <div className="flex flex-wrap">
          <img src="../../src/assets/art2 1.svg" alt="w-1/2" className=" " />
        
        <div className="relative">
          <h1 className="font-poppins  text-[#FE6019E5] font-semibold p-4 ">
            Company information :
          </h1>
          <div>
            <BlueInput w={260} h={40} inputName="Company name" />
            <BlueInput w={260} h={40} inputName="UEN" />
            <BlueInput w={260} h={40} inputName="Company Size" />
            <BlueInput w={260} h={40} inputName="Company adress" />
            <BlueInput w={260} h={40} inputName="Company email" />
            <BlueInput w={260} h={40} inputName="Company phone number & fax" />
            <BlueInput w={260} h={40} inputName="Company website (optional)" />
          </div>

          <div className=" absolute bottom-5 right-[-220px] ">
            <div>

            <PrimaryButton text={"Sign in "} w={200} h={40} />
            <h5>
              already have an account ?
              <span className="text-[#FE6019] hover:cursor-pointer">
              <space> </space> Sign In
              </span>
            </h5>
            </div>
          </div>
        </div>
      </div>
    </div>
  );
};

export default signupMovingCompany;
