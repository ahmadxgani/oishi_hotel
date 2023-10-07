import { Toast } from 'bootstrap'

const Listtarget = document.getElementsByClassName('notif')

for (const target of Listtarget) {
    const toast = Toast.getOrCreateInstance(target)
    toast.show()
}

