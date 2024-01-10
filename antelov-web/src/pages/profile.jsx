import PrimaryButton from "../components/primaryButton";
import BlueInput from "../components/blueInput";

const profile = () => {
  return (
    <div className="bg-[#FFF7F3]">
      <div class="relative flex min-h-screen flex-col justify-center overflow-hidden  py-6 sm:py-12">
        <div class="bg-white max-w-4xl mx-auto w-full">
          <div class="grid grid-cols-6 h-full">
            <div class="bg-blue-900 p-10 col-span-2 rounded-md">
              <h2 class="mb-10 font-bold text-2xl text-blue-100 before:block before:absolute before:bg-sky-300 before:content[''] relative before:w-20 before:h-1 before:-skew-y-3 before:-bottom-4">
                Profile Infos
              </h2>
              <p class="font-bold text-blue-100 py-8 border-b border-blue-700">
                Location Address
                <span class="font-normal text-xs text-blue-300 block">
                  Romada, 16/A, YoYo City, USA
                </span>
              </p>
              <p class="font-bold text-blue-100 py-8 border-b border-blue-700">
                Phone Number
                <span class="font-normal text-xs text-blue-300 block">
                  +889 (909) 567 87 9
                </span>
              </p>
              <p class="font-bold text-blue-100 py-8 border-b border-blue-700">
                Email Address
                <span class="font-normal text-xs text-blue-300 block">
                  example@example.com
                </span>
              </p>
            </div>
            <div class="bg-blue-50 p-14 col-span-4 rounded-lg">
              <h2 class="mb-14 font-bold text-4xl text-blue-900 before:block before:absolute before:bg-sky-300 before:content[''] relative before:w-20 before:h-1 before:-skew-y-3 before:-bottom-4">
                Entrer en contact
              </h2>
              <div class="grid gap-6 mb-6 grid-cols-2 ">
                <div class="flex flex-col">
                  <BlueInput w={220} h={40} inputName="FirstName" />
                </div>
                <div class="flex flex-col">
                  <BlueInput w={220} h={40} inputName="LastName" />
                </div>
              </div>
              <div class="grid gap-6 mb-6 grid-cols-2">
                <div class="flex flex-col">
                  <BlueInput w={220} h={40} inputName="Email Adress" />
                </div>
                <div class="flex flex-col">
                  <BlueInput w={220} h={40} inputName="Password" />
                </div>
              </div>

              <div class="flex justify-center py-10">
                <PrimaryButton text={"edit"} w={150} h={40} />
                <PrimaryButton text={"Valider"} w={150} h={40} />
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  );
};

export default profile;
