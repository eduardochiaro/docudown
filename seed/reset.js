const { PrismaClient } = require('@prisma/client');
const prisma = new PrismaClient();

const seed = async () => {
  await prisma.category.deleteMany();
  console.log('Deleted records in categories table');

  await prisma.$queryRaw`delete from sqlite_sequence where name='Category'`;
  console.log('reset categories auto increment to 1');
}

module.exports = seed;
