const { PrismaClient } = require('@prisma/client');
const prisma = new PrismaClient();

const seed = async () => {
  await prisma.page.deleteMany();
  console.log('Deleted records in Page table');

  await prisma.$queryRaw`delete from sqlite_sequence where name='Page'`;
  console.log('reset Page auto increment to 1');

  await prisma.category.deleteMany();
  console.log('Deleted records in Category table');

  await prisma.$queryRaw`delete from sqlite_sequence where name='Category'`;
  console.log('reset Category auto increment to 1');
}

module.exports = seed;
