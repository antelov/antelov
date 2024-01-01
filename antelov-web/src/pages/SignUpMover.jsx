import BlueInput from "../components/blueInput";
import PrimaryButton from "../components/primaryButton";

const SignUpMover = () => {
  return (
    <div>
      <div className="flex flex-row w-screen h-screen">
        <div className=" w-[50%]">
          <img
            src="../../src/assets/mover sign up 1.svg"
            alt=""
            className=" w-[500px] absolute bottom-0 left-5  "
          />
        </div>
        <div className="bg-white w-[50%]">
          <div className="w-full   flex justify-end items-start p-5  xs:items-center xs:justify-center  ">
            <img
              src="../../src/assets/6.png"
              className="w-24 h-24  text-2xl font-semibold whitespace-nowrap dark:text-black  "
              alt=""
            />
          </div>
          <div className="  flex flex-row justify-around items-center">
            <div>
              <BlueInput w={260} h={40} inputName="Username" />
              <BlueInput w={260} h={40} inputName="Passoword" />
              <BlueInput w={260} h={40} inputName="UEN" />
              <BlueInput w={260} h={40} inputName="Office adress" />
            </div>
            <div>
              <BlueInput w={260} h={40} inputName="Email adress" />
              <BlueInput w={260} h={40} inputName="confirm password" />
              <BlueInput w={260} h={40} inputName="Phone number" />
              <BlueInput w={260} h={40} inputName="Phone number" />
            </div>
          </div>
          <div className="p-5">
            <label
              for="message"
              class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
            >
              Your message
            </label>

            <textarea
              id="message"
              rows="4"
              class="block p-2.5   w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
              placeholder="Write your thoughts here..."
            ></textarea>
          </div>
          <div className=" flex  flex-col justify-end items-end p-5">
            <PrimaryButton text={"Sign in "} w={200} h={40} />
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

export default SignUpMover;
