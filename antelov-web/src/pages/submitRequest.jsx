import BlueInput from "../components/blueInput";
import PrimaryButton from "../components/primaryButton";

const submitRequest = () => {
  return (
    <div className=" flex flex-row  w-screen  h-screen">
      <div className="w-[50%] ">
        <img
          src="../../src/assets/[removal 1.svg"
          alt=""
          className="w-[500px] h-[500px]"
        />
      </div>
                         {/* input screen */}
      <div className="w-[50%]  bg-white p-5 ">
        <h1 className="text-[#FE6019] text-xl">Submit your request</h1>
        <h2 className="text-[#2A478B]  text-l">Moving details</h2>
        <h2 className="text-[#EB1717B2] text-xs">*indicates required</h2>
        <div className=" flex flex-row justify-between">
          <BlueInput w={260} h={40} inputName="PickUp adress" type='text' />
          <BlueInput w={260} h={40} inputName="Destination" type='text' />
        </div>
        <div className="">
          <BlueInput w={260} h={40} inputName="Desired date" type='text'/>
          <BlueInput
            w={260}
            h={40}
            inputName="Type of move (residential,commercial etc..)"
            type='text'
          />
        </div>
        <div className="flex flex-row  justify-between">
          <BlueInput w={260} h={40} inputName="Type of property" type='text'  />
          <BlueInput w={260} h={40} inputName="Weight of property" type='number' />
        </div>

        <div className=" p-5">
          <h1 className="text-xl py-4">Lift accessibility :</h1>
          <div className="flex py-2">
            <h5 className="text-xs px-[10.5px]">Pickup location</h5>
            <input type="checkbox" />
          </div>
          <div className="flex ">
            <h5 className="text-xs px-2"> drop off location </h5>
            <input type="checkbox" />
          </div>
        </div>
        <div className="flex justify-end">
          <PrimaryButton text={"Submit"} w={200} h={40} />
        </div>
      </div>

    </div>
  );
};

export default submitRequest;
