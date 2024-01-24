import BlueInput from "../components/blueInput";
import PrimaryButton from "../components/primaryButton";
import { FontAwesomeIcon } from "@fortawesome/react-fontawesome";
import { faLocationDot, faPlus } from "@fortawesome/free-solid-svg-icons";
const submitRequest = () => {
  return (
    <div className=" flex flex-row   ">
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
        <div className=" flex flex-row justify-between items-center">
          <BlueInput w={260} h={40} inputName="PickUp adress" type="text" />
          <FontAwesomeIcon
            icon={faLocationDot}
            size="xl"
            color="red"
            className="mt-8  cursor-pointer hover:scale-90"
          />
          <BlueInput w={260} h={40} inputName="Destination" type="text" />
          <FontAwesomeIcon
            icon={faLocationDot}
            size="xl"
            color="red"
            className="mt-8 cursor-pointer hover:scale-90"
          />
        </div>
        <div className="">
          <BlueInput w={260} h={40} inputName="Desired date" type="text" />
          <BlueInput
            w={260}
            h={40}
            inputName="Type of move (residential,commercial etc..)"
            type="text"
          />
        </div>
        <div className="flex flex-row  justify-between">
          <div class="relative overflow-x-auto  sm:rounded-lg p-4">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 ">
              <thead class="text-xs text-[#000000B2] uppercase bg-[#EAEAEA]  dark:bg-[#EAEAEA] dark:text-gray-400">
                <tr class=" border ">
                  <th scope="col" class="px-2 py-1 border">
                    Item
                  </th>
                  <th scope="col" class="px-2 py-1 border ">
                    weight
                  </th>
                  <th scope="col" class="px-2 py-1 border">
                    quantity
                  </th>
                  <th scope="col" class="px-2 py-1 border">
                    <div class="dropdown inline-block relative">
                      <button class=" inline-flex items-center">
                        <span class="mr-1"> sevices required</span>
                        <svg
                          class="fill-current h-4 w-4"
                          xmlns="http://www.w3.org/2000/svg"
                          viewBox="0 0 20 20"
                        >
                          <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />{" "}
                        </svg>
                      </button>
                      <ul class="dropdown-menu absolute hidden text-gray-700 pt-1 ">
                        <li class="w-[120px]">
                          <a
                            class="rounded-t bg-gray-200 hover:bg-gray-400 py-2 px-4 block whitespace-no-wrap"
                            href="#"
                          >
                            One
                          </a>
                        </li>
                        <li class="">
                          <a
                            class="bg-gray-200 hover:bg-gray-400 py-2 px-4 block whitespace-no-wrap"
                            href="#"
                          >
                            Two
                          </a>
                        </li>
                        <li class="">
                          <a
                            class="rounded-b bg-gray-200 hover:bg-gray-400 py-2 px-4 block whitespace-no-wrap"
                            href="#"
                          >
                            Three 
                          </a>
                        </li>
                      </ul>
                    </div>
                  </th>

                  <th scope="col" class="px-2 py-3">
                    <div class="bg-[#06BF5B] flex rounded w-5 h-5 items-center justify-center shadow-md hover:scale-90">
                      <FontAwesomeIcon icon={faPlus} color="white" size="lg" />
                    </div>
                  </th>
                </tr>
              </thead>
              <tbody>
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                  <th
                    scope="row"
                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white"
                  >
                    13/10/2022
                  </th>
                  <td class="px-6 py-4">123</td>
                  <td class="px-6 py-4">random street </td>
                  <td class="px-6 py-4">f</td>
                  <td class="px-6 py-4">f</td>
                </tr>
              </tbody>
            </table>
          </div>
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
